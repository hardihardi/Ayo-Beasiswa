$(document).ready(function() {

	// Auto add Icon at card
	$cbIcon = $('.card-icon-background');
	$cbIcon.map(function(k,v) {
		_self = $(v),
		_icon = _self.find('.card-title i').clone();
		
		_self.find('.card-content').append($(_icon[0]).addClass('card-content-icon'));
	});

});
function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}