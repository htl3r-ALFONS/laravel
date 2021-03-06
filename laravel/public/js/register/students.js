document.addEventListener("DOMContentLoaded", function on_dom_load() {
    var input_file,
        input_submit,
        logger,
        token,
        on_submit,
        on_file_read,
        on_inserted,
        on_error,
        on_success,
        students;
    
    window.addEventListener("error", function(error) {
        if (typeof error.error === "string") {
            alert(error.error);
            return true;
        } else {
            return false;
        }
    });
    
    if (document.location.protocol !== "https:") {
        throw "No HTTPS";
        return;
    }
    
    (function setup_input_file() {
        input_file = document.createElement("input");
        input_file.setAttribute("type", "file");
        
        document.body.appendChild(input_file);
    }());
    
    (function setup_input_submit() {
        input_submit = document.createElement("input");
        input_submit.setAttribute("type", "button");
        input_submit.setAttribute("value", "Submit");
        input_submit.setAttribute("disabled", "disabled");
        
        document.body.appendChild(input_submit);
    }());
    
    (function setup_logger() {
        logger = document.createElement("ul");
        logger.log = function log(message) {
            var li = document.createElement("li");
            li.textContent = message;
            logger.appendChild(li);
            return li;
        };
        logger.clear = function clear() {
            while (logger.firstChild) {
                logger.removeChild(logger.firstChild);
            }
        };
        
        document.body.appendChild(logger);
    }());
    
    token = (function get_token() {
        var input_token = document.getElementById("token");
        return input_token.value;
    }());
    
    on_submit = function on_submit() {
        var file,
            filereader;
        
        logger.clear();
        
        logger.log("Checking file");
        
        file = input_file.files[0];
        if (!file) {
            throw "No file given";
        } else if (["application/vnd.ms-excel", "text/plain", "text/csv"].indexOf(file.type) === -1) {
            throw "Given file is not a csv file";
        }
        
        filereader = new FileReader();
        filereader.addEventListener("load", on_file_read);
        filereader.readAsText(file);
    };
    
    on_file_read = function on_file_read() {
        var classrooms,
            lines,
            success;
        
        logger.log("Processing file");

        students = {};
        
        lines = this.result.split(/\r\n|\n|\r/);
        lines.forEach(function for_each_line(line, index) {
            if (line === "") {
                return;
            }
            
            var fields = line.split(",");
            if (fields.length !== 2) {
                throw ("Invalid entry on line " + (index + 1));
            }
            
            var name = fields[0],
                classroom = fields[1].toUpperCase();
            
            if (!/[1-9][A-Z]{2}/.test(classroom)) {
                throw ("Classroom on line " + (index + 1) + " is not well-formed");
            }
            
            if (!Array.isArray(students[classroom])) {
                students[classroom] = [];
            }
            
            students[classroom].push({
                "name": name
            });
        });
        
        logger.log("Adding students");
        
        classrooms = Object.keys(students);
        
        if (classrooms.length === 0) {
            throw "No classrooms";
        }
        
        (function for_each_classroom(index) {
            var classroom = classrooms[index],
                log = logger.log("Adding " + classroom + "..."),
                formdata = new FormData(),
                request = new XMLHttpRequest();

            formdata.append("_token", token);
            formdata.append("count", students[classroom].length);
            formdata.append("classroom", classroom);

            request.addEventListener("load", function () {
                on_inserted(classroom, request);
                
                if (request.status === 200) {
                    log.textContent += "Done";
                    if ((index + 1) in classrooms) {
                        for_each_classroom(index + 1);
                    } else {
                        on_success();
                    }
                } else {
                    log.textContent += "Error";
                    on_error();
                }
            });
            request.addEventListener("error", function () {
                log.textContent += "Error";
                on_error();
            });
            request.open("POST", "/register/student", true);
            request.send(formdata);
        }(0));
    };
    
    on_inserted = function on_inserted(classroom, request) {
        var formdata,
            request_insert,
            response;

        if (request.status !== 200) {
            on_error();
        }

        response = JSON.parse(request.responseText);

        if (response.length !== students[classroom].length) {
            on_error();
        } else {
            students[classroom].forEach(function for_each_student(student, index) {
                // select random (student_id,fishname,password) entry
                var entry = (response.splice(
                    Math.random() * response.length,
                    1
                ))[0];

                students[classroom][index].id = entry.student_id;
                students[classroom][index].fishname = entry.fishname;
                students[classroom][index].password = entry.password;
            });
        }
    };
    
    on_error = function on_error() {
        throw "Server error";
    };
    
    on_success = function on_success() {
        var student_ids,
            student_ids_link,
            student_passwords,
            student_passwords_link;
        
        logger.log("Done");
        
        student_ids = (function gen_student_ids() {
            var blob,
                text;
            
            text = "Name\tID";
            Object.keys(students).forEach(function for_each_classroom(classroom) {
                text += "\n" + classroom;
                students[classroom].forEach(function for_each_student(student) {
                    text += "\n" + student.name + "\t" + student.id;
                });
            });
            
            blob = new Blob([text], {type: "text/plain"});
            
            return URL.createObjectURL(blob);
        }());
        
        student_passwords = (function gen_student_passwords() {
            var blob,
                text;
            
            text = "Name\tLogin\tPassword";
            Object.keys(students).forEach(function for_each_classroom(classroom) {
                text += "\n" + classroom;
                students[classroom].forEach(function for_each_student(student) {
                    text += "\n" + student.name + "\t" + student.fishname + "\t" + student.password;
                });
            });
            
            blob = new Blob([text], {type: "text/plain"});
            
            return URL.createObjectURL(blob);
        }());
        
        student_ids_link = document.createElement("a");
        student_ids_link.setAttribute("href", student_ids);
        student_ids_link.setAttribute("target", "_blank");
        student_ids_link.setAttribute("download", "student_ids.txt");
        student_ids_link.textContent = "Ids";
        document.body.appendChild(student_ids_link);
        
        student_passwords_link = document.createElement("a");
        student_passwords_link.setAttribute("href", student_passwords);
        student_passwords_link.setAttribute("target", "_blank");
        student_passwords_link.setAttribute("download", "student_logins.txt");
        student_passwords_link.textContent = "Logins";
        document.body.appendChild(student_passwords_link);
    };
    
    input_submit.removeAttribute("disabled");
    input_submit.addEventListener("click", on_submit);
});