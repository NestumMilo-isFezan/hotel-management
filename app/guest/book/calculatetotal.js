$(document).ready(function () {
  // Event when checkin, checkout and service is selected
  $("#checkin, #checkout, #services").change(function () {
    const checkIn = new Date($("#checkin").val());
    const checkOut = new Date(
      $("#checkout").val() ||
        new Date(checkIn.getTime() + 24 * 60 * 60 * 1000)
          .toISOString()
          .split("T")[0]
    );

    if (checkIn >= checkOut) {
      alert("Error: Check-out date must be later than check-in date.");
      const tomorrow = new Date(checkIn.getTime() + 24 * 60 * 60 * 1000);
      $("#checkout").val(tomorrow.toISOString().split("T")[0]);
      return;
    }

    const diffDays = Math.abs(checkOut - checkIn) / (1000 * 3600 * 24);
    const pricePerDay = $("#price").val();
    const totalPrice = pricePerDay * diffDays;

    $("#estprice").text(totalPrice);
    $("#totalprice").val(totalPrice);
  });
});
