const checkAll = document.getElementById("checkAll");
var listItemCheck = document.querySelectorAll("#productItem");
var totalItemCheck = listItemCheck.length;
checkAll.addEventListener("change", (e) => {
  if (e.currentTarget.checked) {
    // [...listItemCheck].forEach((item) => {
    //   item.checked = true;
    // });
    $.ajax({
      type: "POST",
      url: "?pages=cart",
      data: {
        action: "checkAll",
      },
      success: function (data) {
        // alert(parseFloat(JSON.parse(data)));
        [...listItemCheck].forEach((item) => {
          item.checked = true;
        });
      },
      error: function (xhr, status, error) {
        console.info("err" + xhr.responseText, error);
      },
    });
  } else {
    [...listItemCheck].forEach((item) => {
      item.checked = false;
    });
  }
});
var countItemChecked = 0;
[...listItemCheck].forEach((item) => {
  item.addEventListener("change", (e) => {
    var countChecked = $('input[name="checkItems"]:checked').length;
    console.info(countChecked);
    if (countChecked == totalItemCheck) {
      checkAll.checked = true;
    } else {
      checkAll.checked = false;
    }
  });
});
