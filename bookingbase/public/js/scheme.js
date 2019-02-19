'use strict';
let execute = function () {
  if (typeof resObj !== 'undefined') {
    // console.log(resObj[0].res_date);
    // console.log(resObj[0].res_module);

    for (var i = 0; i < resObj.length; i++) {
      console.log(resObj[i].res_date);
      console.log(resObj[i].res_module);
      $c('2019-02-20')[0].style.backgroundColor='red';
      // $c('scheme')[0].style.backgroundColor='red';
    }
}

}

/*
 * activate theFunction when document has finished loading
 */
window.addEventListener('load', execute);
