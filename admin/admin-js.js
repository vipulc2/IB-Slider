// Function (IIFE) to Manage all Functions on admin side settings page.
jQuery(function() {
  // Get the images with WordPress Media Uploader on Button click.
  jQuery( '#btnImage' ).on('click', function() {
    var images = wp.media({
        title: 'Upload Image for Slider',
        multiple: true
    }).open().on( 'select', function( e ) {
        var uploadedImages = images.state().get( 'selection' );
        var selectedImages = uploadedImages.toJSON();
        // Creating li tags along with img tags inside them with src set to what we got from
        // WP media upload and also adding an "a" tag to remove each slide.
        selectedImages.forEach( ( eachimage ) => {

          // Creating li tag with className for sortable jquery.
          let listImg = document.createElement( 'li' );
          listImg.className = 'ui-state-default unique';

          // Creating img tag and setting src in it.
          let img = document.createElement( 'img' );
          img.setAttribute( 'src', `${eachimage.url}` );

          // Create 'a' tag and adding class and value to it.
          let removeLink = document.createElement( 'a' );
          removeLink.className = 'delete-item';
          removeLink.appendChild( document.createTextNode( 'Remove' ) );

          // Appending img to li tag.
          listImg.appendChild( img );
          // Appending a tag to li tag.
          listImg.appendChild( removeLink );

          // Appending the li tag to ul.
          document.getElementById( 'sortable' ).appendChild( listImg );

        });

      } );
  });

  // Variable and event to save order of the images on hidden text field.
  let submitMouse = document.getElementById( 'submit' );

  // Event mouse over which fires before the submit is made.
  submitMouse.addEventListener( 'mouseenter', () => {

    let listItems = document.getElementsByClassName( 'unique' );

    let lis = Array.from( listItems );

    // Selecting the hidden text field and setting value to none.
    let hiddenField = document.querySelector( '#hidden-img' );
        hiddenField.value = '';

    // This variable will hold the array of URLs.
    let imgListUrlArray = ``;
    lis.forEach( ( eachlis ) => {

      // Getting the values of src from img.
      let imgListUrl = eachlis.firstElementChild.getAttribute( 'src' );

      // Adding each url with a comma to the Array variable.
      imgListUrlArray += `${imgListUrl},`;

      // Setting value of hidden text field with the Array with commas.
      document.querySelector( '#hidden-img' ).value = imgListUrlArray;

    } );
  
  } );

  // Event on key down on keyboard.
  submitMouse.addEventListener( 'keydown', () => {

    let listItems = document.getElementsByClassName( 'unique' );

    let lis = Array.from( listItems );

    // Selecting the hidden text field and setting value to none.
    let hiddenField = document.querySelector( '#hidden-img' );
        hiddenField.value = '';

    // This variable will hold the array of URLs.
    let imgListUrlArray = ``;
    lis.forEach( ( eachlis ) => {

      // Getting the values of src from img.
      let imgListUrl = eachlis.firstElementChild.getAttribute( 'src' );

      // Adding each url with a comma to the Array variable.
      imgListUrlArray += `${imgListUrl},`;

      // Setting value of hidden text field with the Array with commas.
      document.querySelector( '#hidden-img' ).value = imgListUrlArray;

    } );
  
  } );

  // Making an Event Listener for removing the slides (removing the li element).
  document.querySelector( '.ul-unique' ).addEventListener( 'click', (e) => {

    if ( e.target.className === 'delete-item' ) {
      // Deletes when click Remove Link Below the Image
      e.target.parentElement.remove();
    }
  
  } );
      
  // This function is used for making sortable li elements for ordering the slides.
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
    } );


});
