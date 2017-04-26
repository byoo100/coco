/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function($) {

	//Cache DOM
	var $desktop_main = $("#desktop-main");
	var $desktop_menu = $("#desktop-menu");
	var $mobile_main = $("#mobile-main");
	var $mobile_menu = $("#mobile-menu");
	var $mobile_open = $("#mobile-open");
	var $mobile_close = $("#mobile-close");
	var $dark_overlay = $("#dark-overlay");


	//Init

	//MOBILE OPEN BUTTON
	$($mobile_open).on("click", function(){
		$($mobile_main).fadeIn("300");
		$($mobile_main).removeClass("left");
		$($dark_overlay).fadeIn("300");
	});

	//MOBILE CLOSE BUTTON
	$.merge($mobile_close, $dark_overlay).on("click", function(){
		$($mobile_main).fadeOut("300");
		$($mobile_main).addClass("left");
		$($dark_overlay).fadeOut("300");
	});

	//ADD DROPDOWN BUTTON TO MENU ITEMS
	$.merge($mobile_menu, $desktop_menu).find('.menu-item-has-children > a').after("<button class=dropdown></button>");
	//$($desktop_menu).find('.menu-item-has-children > a').after("<button class=dropdown></button>");

	//ADD TOGGLE FUNCTION TO DROPDOWN BUTTON
	// $($mobile_menu).find('.dropdown').on("click", function(){
	// 	$(this).next().slideToggle();
	// });

	$.merge($mobile_menu, $desktop_menu).find('.dropdown').on("click", function(){
		var submenu = this.nextElementSibling;
		if( -1 == submenu.className.indexOf('toggled')){
			submenu.className += ' toggled';
		} else {
			submenu.className = submenu.className.replace(' toggled', '');
		}
	});

	//CLICK FUNCTION FOR CONTACT LIST
	var $contact, $previous_button;
	$($desktop_main).find('button.contact').on("click", function(){

		$contact = $(this).children(":first");

		if( $previous_button == null || $($contact).is($previous_button)){
			$($contact).toggleClass("hide");
		} else {
			if(!$($previous_button).hasClass("hide")){
				$($previous_button).addClass("hide");
			}
			$($contact).removeClass("hide");
		}//if-else

		$previous_button = $(this).children(":first");;
	});

	// DESKTOP SUBMENU
	//========
	// for (var i = 0; i < children_desktop.length; i++){
	// 	dropdown_PC = document.createElement('button');
	// 	dropdown_PC.className = "dropdown-toggle";
	//
	// 	insertAfter(children_desktop[i].firstChild, dropdown_PC);
	//
	// 	pcSubToggle(dropdown_PC);
	//}//for DESKTOP
 //=================


 // MOBILE SUBMENU
 //========
 // for (var i = 0; i < children_mobile.length; i++){
 //  dropdown_Mobile = document.createElement('button');
 //  dropdown_Mobile.className = "dropdown-toggle";
 //
 //  insertAfter(children_mobile[i].firstChild, dropdown_Mobile);
 //
 //  mobileSubToggle(dropdown_Mobile);

	 //mobileSubToggle(dropdown_Mobile);
 //}//for MOBILE
//=================




	function pcSubToggle(button){
		// BUTTON
	  button.onclick = function(){
	 	 submenu = this.nextElementSibling;

	 	 if ( -1 == this.className.indexOf( 'toggled' ) ){
	 		 this.className += ' toggled';
	 		 submenu.style.display = 'block';
	 	 } else {
	 		 this.className = this.className.replace( ' toggled', '' );
	 		 submenu.style.display = 'none';
	 	 }
	  }//MOBILE onclick
	}//pcSubToggle


	function mobileSubToggle(button){
		// BUTTON
		button.onclick = function(){
	 	 submenu = this.nextElementSibling;

	 	 if ( -1 == this.className.indexOf( 'toggled' ) ){
	 		 this.className += ' toggled';
	 		 submenu.style.display = 'table';
	 	 } else {
	 		 this.className = this.className.replace( ' toggled', '' );
	 		 submenu.style.display = 'none';
	 	 }
	  }//MOBILE onclick
	}//mobileSubToggle

	function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

} )(jQuery);
