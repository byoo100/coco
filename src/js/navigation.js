/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var mainMenu, menuDesktop, menuMobile, children_desktop = [], children_mobile = [];
	var submenu, dropdown_PC, dropdown_Mobile, open_Mobile, close_Mobile, overlay;
	//Cache DOM
	mainMenu = document.getElementById( 'nav-menubar' );
	menuDesktop = document.getElementById( 'nav-list' );
	menuMobile = document.getElementById( 'mobile-menu' );
	children_desktop = menuDesktop.getElementsByClassName('menu-item-has-children');
	children_mobile = menuMobile.getElementsByClassName('menu-item-has-children');

	overlay = menuMobile.getElementsByClassName( 'dark-overlay' )[0];
	open_Mobile = mainMenu.getElementsByClassName( 'mobile-toggle' )[0];
	close_Mobile = menuMobile.getElementsByClassName( 'close-toggle' )[0];

	open_Mobile.onclick = function(){
		menuMobile.style.display = 'block';
		overlay.style.display = 'block';
	}

	close_Mobile.onclick = function(){
		menuMobile.style.display = 'none';
		overlay.style.display = 'none';
	}

	// DESKTOP SUBMENU
	//========
	for (var i = 0; i < children_desktop.length; i++){
		dropdown_PC = document.createElement('button');
		dropdown_PC.className = "dropdown-toggle";

		insertAfter(children_desktop[i].firstChild, dropdown_PC);

		pcSubToggle(dropdown_PC);
	}//for DESKTOP
 //=================


 // MOBILE SUBMENU
 //========
 for (var i = 0; i < children_mobile.length; i++){
	 dropdown_Mobile = document.createElement('button');
	 dropdown_Mobile.className = "dropdown-toggle";

	 insertAfter(children_mobile[i].firstChild, dropdown_Mobile);

	 mobileSubToggle(dropdown_Mobile);

	 //mobileSubToggle(dropdown_Mobile);
 }//for MOBILE
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

} )();
