// function openWindow() {
//     // Ambil semua elemen dengan class "quantity-input"
//     var quantityInputs = document.getElementsByClassName("quantity-input");

//     var orderDetails = [];

//     // Loop melalui setiap input jumlah makanan
//     for (var i = 0; i < quantityInputs.length; i++) {
//         var quantity = parseInt(quantityInputs[i].value); // Ambil nilai jumlah pesanan
//         var foodName = quantityInputs[i].closest(".card").querySelector(".card-title").textContent; // Ambil nama makanan
//         var foodPrice = quantityInputs[i].closest(".card").querySelector(".card-text").textContent.replace("Rp. ", "").replace(".", "").replace(",", "."); // Ambil harga makanan

//         var total = quantity * parseFloat(foodPrice); // Hitung total harga

//         if (quantity > 0) {
//             orderDetails.push({
//                 name: foodName,
//                 quantity: quantity,
//                 total: total
//             });
//         }
//     }

//     // Buka jendela baru dengan data yang diperlukan
//     var newWindow = window.open("", "_blank");
//     newWindow.document.write("<h1>Detail Order</h1>");

//     orderDetails.forEach(function (order) {
//         newWindow.document.write("<p>Nama Makanan: " + order.name + "</p>");
//         newWindow.document.write("<p>Jumlah: " + order.quantity + "</p>");
//         newWindow.document.write("<p>Total Harga: Rp. " + order.total.toFixed(2).replace(".", ",") + "</p>");
//         newWindow.document.write("<hr>");
//     });
// }