document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault(); // Mencegah pengiriman formulir default

    // Ambil data dari formulir
    const formData = {
        from_name: document.getElementById("name").value,
        from_email: document.getElementById("email").value,
        booking_date: document.getElementById("booking_date").value || "Not specified",
        booking_time: document.getElementById("booking_time").value || "Not specified",
        number_of_people: document.getElementById("number_of_people").value || "Not specified",
        event_type: document.getElementById("event_type").value || "Not specified",
    };

    // Pesan yang dikirimkan
    const message = `
        Booking Details:
        - Date: ${formData.booking_date}
        - Time: ${formData.booking_time}
        - Number of People: ${formData.number_of_people}
        - Event Type: ${formData.event_type}
    `;

    // Kirim email via EmailJS
    emailjs.send("service_mdvejuj", "template_j0uq6yn", {
        from_name: formData.from_name,
        from_email: formData.from_email,
        message: message,
    })
    .then(
        function(response) {
            alert("Email sent successfully!");
            document.getElementById("contactForm").reset(); // Reset formulir
        },
        function(error) {
            alert("Failed to send email. Please try again.");
            console.error("Error:", error);
        }
    );
});