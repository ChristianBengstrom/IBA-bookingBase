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

      // toggle class "selected" on target:
      e.target.classList.toggle('selected');

      var qtSelected = $("qtSelected");
      qtSelected.setAttribute("value", $c('selected').length);

      if ($c('selected').length>0) {
        toggleBookBtn();          // BTN show
      } else {
        bookBtn.disabled = true;  // BTN hide
      }

      // if class "selected" exists on target:
      if (e.target.classList[2]) {
        //insert input element
        var newResEl = document.createElement("INPUT");
        newResEl.setAttribute("value", e.target.classList[0] + " " + e.target.classList[1]);
        newResEl.setAttribute("id", 'res' + e.target.classList[0] + " " + e.target.classList[1]);
        newResEl.setAttribute("type", 'hidden');
        newResEl.setAttribute("name", 'newRes' + ($t('input').length-1));
        form.insertBefore(newResEl, bookBtn);

      } else {
        //remove input element
        let newResEl = $( 'res' + e.target.classList[0] + " " + e.target.classList[1] );
        newResEl.parentNode.removeChild(newResEl);

      }
  });

};

let form = $('bookForm');
let tbl = $("scheme");
let bookBtn = $('book');

window.addEventListener('load', execute);
