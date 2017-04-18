/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var menuDesktop, menuMobile, children_desktop = [], children_mobile = [];
	var submenu, buttonDesktop, buttonMobile, buttonPrevious;
	//Cache DOM
	menuDesktop = document.getElementById( 'nav-list' );
	menuMobile = document.getElementById( 'mobile-list' );
	children_desktop = menuDesktop.getElementsByClassName('menu-item-has-children');
	children_mobile = menuMobile.getElementsByClassName('menu-item-has-children');



	// DESKTOP
	//========
	for (var i = 0; i < children_desktop.length; i++){
		buttonDesktop = document.createElement('button');
		buttonDesktop.className = "dropdown-toggle";

		insertAfter(children_desktop[i].firstChild, buttonDesktop);

		desktopDropdown(buttonDesktop);
	}//for DESKTOP
 //=================



 // MOBILE
 //========
 for (var i = 0; i < children_mobile.length; i++){
	 buttonMobile = document.createElement('button');
	 buttonMobile.className = "dropdown-toggle";

	 buttonPrevious = document.createElement('li');
	 buttonPrevious.innerHTML = '<a class="goBack">Back</a>';

	 insertAfter(children_mobile[i].firstChild, buttonMobile);

	 submenu = buttonMobile.nextElementSibling;
	 submenu.insertBefore(buttonPrevious, submenu.firstChild);

	 mobileDropdown(buttonMobile);

	 //mobileDropdown(buttonMobile);
 }//for MOBILE
//=================




	function desktopDropdown(button){
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
	}//desktopDropdown


	function mobileDropdown(button){
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
	}//mobileDropdown

	function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

	// button = container.getElementsByTagName( 'button' )[0];


	// menu.setAttribute( 'aria-expanded', 'false' );
	// if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
	// 	menu.className += ' nav-menu';
	// }
	//
	// button.onclick = function() {
	// 	if ( -1 !== container.className.indexOf( 'toggled' ) ) {
	// 		container.className = container.className.replace( ' toggled', '' );
	// 		button.setAttribute( 'aria-expanded', 'false' );
	// 		menu.setAttribute( 'aria-expanded', 'false' );
	// 	} else {
	// 		container.className += ' toggled';
	// 		button.setAttribute( 'aria-expanded', 'true' );
	// 		menu.setAttribute( 'aria-expanded', 'true' );
	// 	}
	// };

	// Get all the link elements within the menu.
	// links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	// for ( i = 0, len = links.length; i < len; i++ ) {
	// 	links[i].addEventListener( 'focus', toggleFocus, true );
	// 	links[i].addEventListener( 'blur', toggleFocus, true );
	// }

	/**
	 * Sets or removes .focus class on an element.
	 */
	// function toggleFocus() {
	// 	var self = this;
	//
	// 	// Move up through the ancestors of the current link until we hit .nav-menu.
	// 	while ( -1 === self.className.indexOf( 'nav-menu' ) ) {
	//
	// 		// On li elements toggle the class .focus.
	// 		if ( 'li' === self.tagName.toLowerCase() ) {
	// 			if ( -1 !== self.className.indexOf( 'focus' ) ) {
	// 				self.className = self.className.replace( ' focus', '' );
	// 			} else {
	// 				self.className += ' focus';
	// 			}
	// 		}
	//
	// 		self = self.parentElement;
	// 	}
	// }

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	// ( function( container ) {
	// 	var touchStartFn, i,
	// 		parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
	//
	// 	if ( 'ontouchstart' in window ) {
	// 		touchStartFn = function( e ) {
	// 			var menuItem = this.parentNode, i;
	//
	// 			if ( ! menuItem.classList.contains( 'focus' ) ) {
	// 				e.preventDefault();
	// 				for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
	// 					if ( menuItem === menuItem.parentNode.children[i] ) {
	// 						continue;
	// 					}
	// 					menuItem.parentNode.children[i].classList.remove( 'focus' );
	// 				}
	// 				menuItem.classList.add( 'focus' );
	// 			} else {
	// 				menuItem.classList.remove( 'focus' );
	// 			}
	// 		};
	//
	// 		for ( i = 0; i < parentLink.length; ++i ) {
	// 			parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
	// 		}
	// 	}
	// }( container ) );
} )();
