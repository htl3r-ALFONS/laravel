document.addEventListener("DOMContentLoaded", function on_dom_load() {
    var input_file,
        input_submit,
        logger,
        token,
        on_submit,
        on_file_read,
        on_inserted,
        on_error,
        teachers;
    
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
        var lines,
            success;
        
        logger.log("Processing file");

        teachers = [];
        
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
                email = fields[1];
            
            teachers.push({
                "name": name,
                "email": email
            });
        });
        
        logger.log("Adding teachers");
        
        (function post_teachers() {
            var formdata = new FormData(),
                request = new XMLHttpRequest();
            
            formdata.append("_token", token);
            teachers.forEach(function for_each_teacher(teacher) {
                formdata.append("names[]", teacher.name);
                formdata.append("emails[]", teacher.email);
            });
            
            request.addEventListener("load", on_inserted);
            request.addEventListener("error", on_error);
            request.open("POST", "/register/teacher", true);
            request.send(formdata);
        }());
    };
    
    on_inserted = function on_inserted() {
        if (this.status !== 200) {
            on_error();
        }
        
        logger.log("Done");
    };
    
    on_error = function on_error() {
        throw "Server error";
    };
    
    input_submit.removeAttribute("disabled");
    input_submit.addEventListener("click", on_submit);
});