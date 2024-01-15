$(document).ready(function () {
  $("#addform").submit(function (e) {
    e.preventDefault();

    $.ajax({
      url: "add.php",
      type: "POST",
      data: {
        servicename: $("#servicename").val(),
        description: $("#description").val(),
        price: $("#price").val(),
        status: $("#status").val(),
      },
    })
      .done(function (data) {
        alert("Success");
      })
      .fail(function () {
        alert("Fail");
      });
  });
});
