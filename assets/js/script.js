  $(document).ready(function () {
      $('.materialboxed').materialbox();
      $('.sidenav').sidenav();
      $('select').formSelect();
      tinymce.init({
        selector:'#content'});
  });
