
function rowcount() {
  $.fn.rowCount = function () {
    return $('tr', $(this).find('tbody')).length;
  };
  rowctr = $('#table1').rowCount();
  return rowctr;
}


function addRow() {
  tbody = document.getElementsByTagName("tbody")[0];
  data = document.getElementsByClassName("edu");

  tr = document.createElement("tr")
  tbody.appendChild(tr)

  td = document.createElement("td")
  td.innerText = data[0].value
  tr.appendChild(td)
  data[0].value = "";

  td = document.createElement("td")
  td.innerText = data[1].value
  tr.appendChild(td)
  data[1].value = "";

  td = document.createElement("td")
  td.innerText = data[2].value
  tr.appendChild(td)
  data[2].value = "";

  td = document.createElement("td")
  td.innerText = data[3].value
  tr.appendChild(td)
  data[3].value = "";

  td = document.createElement("td")
  td.innerText = data[4].value
  tr.appendChild(td)
  data[4].value = "";
}

fields = document.getElementsByClassName("edu");
add = document.getElementById("validate");
add.addEventListener('click', (e) => {


  if (fields[0].value == "" || fields[1].value == "" || fields[2].value == "" || fields[3].value == "" || fields[4].value == "") {
    if (!document.getElementById("check")) {
      invalid = document.createElement('div');
      invalid.setAttribute('class', 'invalid');
      invalid.setAttribute('id', 'check');
      invalid.innerText = "please add all the fields"
      document.getElementsByClassName('outer')[0].appendChild(invalid)
    }
  }
  else {
    if (document.getElementById("check")) {
      document.getElementsByClassName('outer')[0].removeChild(invalid);
    }
    addRow();
  }

});



function edu_valid() {
  if (!document.getElementById("check")) {
    invalid = document.createElement('div');
    invalid.setAttribute('class', 'invalid');
    invalid.setAttribute('id', 'check');
    invalid.innerText = "please add atleast one row"
    document.getElementsByClassName('outer')[0].appendChild(invalid)
  }
}
file1_invalid = true
file2_invalid = true
File1validation = () => {
  const fi = document.getElementById('file1');

  // Check if any file is selected. 
  if (fi.files.length > 0) {
    for (let i = 0; i <= fi.files.length - 1; i++) {

      const fsize = fi.files.item(i).size;
      const file = Math.round((fsize / 1024));
      // The size of the file. 
      if (file >= 50) {
        file1_invalid = true;
      } else {
        document.getElementById('size').innerHTML = '<b>'
          + file + '</b> KB';
      }
    }
  }
}

File2validation = () => {

  const fi = document.getElementById('file2');
  // Check if any file is selected. 
  if (fi.files.length > 0) {
    for (let i = 0; i <= fi.files.length - 1; i++) {

      const fsize = fi.files.item(i).size;
      const file = Math.round((fsize / 1024));
      // The size of the file. 
      if (file >= 50) {
        file2_invalid = true;
      } else {
        document.getElementById('size').innerHTML = '<b>'
          + file + '</b> KB';
      }
    }
  }
}

function file_size_valid(val) {
  if (!document.getElementById("check")) {
    invalid = document.createElement('div');
    invalid.setAttribute('class', 'invalid');
    invalid.setAttribute('id', 'check');
    invalid.innerText = "Size is greater than 50KB";
    document.getElementById(val).appendChild(invalid);
  }
}

(function () {
  'use strict';
  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false || rowcount() == 1 || file1_invalid == true || file2_invalid == true) {
          event.preventDefault();
          event.stopPropagation();
          if (rowcount() == 1) {
            edu_valid()
          }
          if (file1_invalid == true) {
            file_size_valid('size1_check')
          }
          if (file2_invalid == true) {
            file_size_valid('size2_check')

          }
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


