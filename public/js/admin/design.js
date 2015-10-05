$(function() {
  /**
   * Module designModule implement Revealing Module Pattern
   */
  var designModule = (function() {
    var architecture = [
      {id:"1",text:"Biệt thự phố"},
      {id:"2",text:"Biệt thự vườn"},
      {id:"3",text:"Nhà phố"},
      {id:"4",text:"Thể loại khác"}
    ];
    var furniture = [
      {id:"1",text:"Hiện đại"},
      {id:"2",text:"Cổ điển"},
      {id:"3",text:"Căn hộ"},
      {id:"4",text:"Thể loại khác"}
    ];
    var construction = [
      {id:"1",text:"Biệt thự phố"},
      {id:"2",text:"Biệt thự vườn"},
      {id:"3",text:"Nhà phố"},
      {id:"4",text:"Thể loại khác"}
    ];
    var validateFrom = {};

    var init = function() {
      // init option for sub category
      addOptionsForSubCategory(architecture);

      formValidate();
      formStepProcess();

      $("#category").change(function() {
        var parent = $(this).val();
        switch(parent){
          case '1':
            addOptionsForSubCategory(architecture);
            break;
          case '2':
            addOptionsForSubCategory(furniture);
            break;
          case '3':
            addOptionsForSubCategory(construction);
            break;
        }
      });
    };

    var formValidate = function() {
      validateFrom = $("#designForm").validate({
        rules: {
          category: {
            required: true,
            digits: true
          },
          sub_category: {
            required: true,
            digits: true
          }
        },
        highlight: function (element) {
          $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
          $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
          error.insertAfter(element);
        }
      });
    }

    var formStepProcess = function() {
      $(".form-open1").click(function() {
        if (validateFrom.form()) {
          hiddenAllFormFieldset();
          $("#form-fieldset2").show("slow");
        }
      });

      $(".form-open2").click(function() {
        if (validateFrom.form()) {
          hiddenAllFormFieldset();
          $("#form-fieldset3").show("slow");
        }
      });

      $(".form-back2").click(function() {
        hiddenAllFormFieldset();
        $("#form-fieldset1").show("slow");
      });

      $(".form-back3").click(function() {
        hiddenAllFormFieldset();
        $("#form-fieldset2").show("slow");
      });
    }

    var hiddenAllFormFieldset = function() {
      $(".form-fieldset").hide("fast");
    }

    /**
     * Populate child select box
     * @param array options
     */
    var addOptionsForSubCategory = function(options) {
      $("#sub_category").html(""); //reset child options
      $(options).each(function (i) { //populate child options
        $("#sub_category").append('<option value="'+options[i].id+'">'+options[i].text+'</option>');
      });
    };

    return {
      init: init
    };
  })();

  designModule.init();
});