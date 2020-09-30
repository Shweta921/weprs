$(function() {

  $(".numbers-row").append('<div class="item-counter"><span id="less-item" class="dec butto pull-left" style="padding-top:0px;">-</span><input type="text" value="0" id="total-items" name="stk[]" class="items-total"><span id="pluss-item" class="inc butto pull-right" style="padding-top:0px;">+</span></div>');

  $(".butto").on("click", function() {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();

    if ($button.text() == "+") {
  	  var newVal = parseFloat(oldValue) + 1;
  	} else {
	   // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
	    } else {
        newVal = 0;
      }
	  }

    $button.parent().find("input").val(newVal);

  });

});