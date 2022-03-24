<!DOCTYPE html>
<html lang="en">
  
<head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
            initial-scale=1, shrink-to-fit=no" />
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  
    <title>
        How to use simple API using AJAX ?
    </title>
</head>
  
<body onload="buttonclickhandler()">
    <button type="button" id="fetchBtn"
            class="btn btn-primary">
        Fetch Data
    </button>
  
    <div class="container">
        <h1>Employee List</h1>
        <ul id="list"></ul>
    </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js,
         then Bootstrap JS -->
    <script>
        //let fetchBtn = document.getElementById("fetchBtn");
  
        //fetchBtn.addEventListener("click", buttonclickhandler);
  
        function buttonclickhandler() {
  
            // Instantiate an new XHR Object
            const xhr = new XMLHttpRequest();
  
            // Open an obejct (GET/POST, PATH,
            // ASYN-TRUE/FALSE)
            xhr.open("GET", "http://dummy.restapiexample.com/api/v1/employees", true);
   
            // When response is ready
            xhr.onload = function () {
                if (this.status === 200) {
  
                    // Changing string data into JSON Object
                    obj = JSON.parse(this.responseText);
  
                    // Getting the ul element
                    let list = document.getElementById("list");
                    str = ""
                    for (key in obj.data) {
                        str += 
                        `<li>${obj.data[key].employee_name}</li>`;
                    }
                    list.innerHTML = str;
                }
                else {
                    console.log("File not found");
                }
            }
            xhr.send();
        }
    </script>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity=
"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous">
    </script>
      
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity=
"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
    </script>
      
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity=
"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
    </script>
</body>
  
</html>