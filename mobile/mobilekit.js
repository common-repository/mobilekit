/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
  $.mobile.changePage({
	url: "searchresults.php",
	type: "get",
	data: $("form#search").serialize()
});
})

