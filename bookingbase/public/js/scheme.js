'use strict';
let execute = function () {

  // Submit btn
  function toggleBookBtn() {
    bookBtn.disabled = true ? false : true;
  }

  if (typeof resObj !== 'undefined') {

    for ( var i = 0; i < resObj.length; i++ ) {

      let resDate = resObj[i].res_date;
      let resModule = resObj[i].res_module;

      for ( var r = 1, row; row = tbl.rows[r]; r++ ) {
        for ( var c = 1, col; col = row.cells[c]; c++ ) {

          let classStr = col.className;
          let classArr = classStr.split(" ");
          if ( classArr[0] == resObj[i].res_date && classArr[1] == resObj[i].res_module ) {
            col.style.backgroundColor = 'darkred';
          }

        }
      }
    }
  }

  tbl.addEventListener('click', function(e) {

      if (e.target.nodeName.toUpperCase() !== "TD" ||
          e.target.className == "tmp" ||
          e.target.style.backgroundColor == 'darkred')
      return;

      e.target.classList.toggle('selected');
      // BTN show/hide
      if ($c('selected').length>0) {
        toggleBookBtn();
      } else {
        bookBtn.disabled = true;
      }

      if (e.target.classList[2]) {
        var newResDate = document.createElement("INPUT");
        newResDate.setAttribute("value", e.target.classList[0]);
        newResDate.setAttribute("id", 'input' + e.target.classList[0]);
        newResDate.setAttribute("type", 'text');
        newResDate.setAttribute("name", e.target.classList[0] + '_' + e.target.classList[1] + 'date');
        form.insertBefore(newResDate, bookBtn);

        var newResModule = document.createElement("INPUT");
        newResModule.setAttribute("value", e.target.classList[1]);
        newResModule.setAttribute("id", 'input' + e.target.classList[1]);
        newResModule.setAttribute("type", 'number');
        newResModule.setAttribute("name", e.target.classList[0] + '_' + e.target.classList[1] + 'module');
        form.insertBefore(newResModule, bookBtn);
      } else {
        let newDateEl = $( 'input' + e.target.classList[0] );
        newDateEl.parentNode.removeChild(newDateEl);

        let newModuleEl = $( 'input' + e.target.classList[1] );
        newModuleEl.parentNode.removeChild(newModuleEl);
      }
  });

};

let form = $('bookForm');
let tbl = $("scheme");
let bookBtn = $('book');

window.addEventListener('load', execute);
