$(document).ready(function () {
  // Variables
  let totalHotel = 0;
  let servicePay = 0;
  let totalpayment = 0;

  // Function to update totalPrice
  function updateTotalPrice() {
    const totalPrice = (totalHotel + servicePay).toFixed(2);
    $("#estprice").text(totalPrice);
    $("#totalprice").val(totalPrice);
    totalpayment = totalPrice;
  }

  // Event when checkin and checkout is selected
  $("#checkin, #checkout").change(function () {
    // Init Date
    const checkIn = new Date($("#checkin").val());
    const checkOut = new Date(
      $("#checkout").val() ||
        new Date(checkIn.getTime() + 24 * 60 * 60 * 1000)
          .toISOString()
          .split("T")[0]
    );

    // Validate Date
    if (checkIn >= checkOut) {
      alert("Error: Check-out date must be later than check-in date.");
      const tomorrow = new Date(checkIn.getTime() + 24 * 60 * 60 * 1000);
      $("#checkout").val(tomorrow.toISOString().split("T")[0]);
      return;
    }

    const diffDays = Math.abs(checkOut - checkIn) / (1000 * 3600 * 24);
    const pricePerDay = $("#price").val();
    totalHotel = pricePerDay * diffDays;

    // Update totalPrice
    updateTotalPrice();
  });

  // Separate event for #servicess
  $("#services").change(function () {
    const servselected = $("#services").find(":selected").val();
    $.ajax({
      type: "GET",
      url: "getserviceprice.php",
      data: { service: servselected },
      dataType: "json",
      success: function (data) {
        servicePay = Number(data.price);

        // Update totalPrice
        updateTotalPrice();
      },
    });
  });

  $("#submitit").click(function (e) {
    e.preventDefault();

    const roomID = $('input[name="roomID"]').val();
    const guestID = $('input[name="guestID"]').val();
    const services = $("#services").find(":selected").val();
    const checkin = $("#checkin").val();
    const checkout = $("#checkout").val();
    const totalprice = $("#totalprice").val();

    $.ajax({
      url: "book.php",
      type: "post",
      data: {
        roomID: roomID,
        guestID: guestID,
        services: services,
        checkin: checkin,
        checkout: checkout,
        totalprice: totalprice,
      },
      success: function (response) {
        // handle success
        alert("Success");
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // handle error
        alert("Error");
      },
    });
  });
});
