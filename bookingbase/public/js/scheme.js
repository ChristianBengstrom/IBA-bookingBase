'use strict';
let execute = function () {

  if (typeof resObj !== 'undefined') {
    let table = $("scheme");

    for ( var i = 0; i < resObj.length; i++ ) {

      let resDate = resObj[i].res_date;
      let resModule = resObj[i].res_module;

      for ( var r = 1, row; row = table.rows[r]; r++ ) {
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

}


window.addEventListener('load', execute);
