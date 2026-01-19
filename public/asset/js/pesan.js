// Form submission handler

document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Mencegah reload halaman

  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const subject = document.getElementById("subject").value;
  const message = document.getElementById("message").value;

  const text = `Assalamualaikum wr. wb., saya ${name} (%0AEmail: ${email}) ingin menghubungi Anda.%0A%0ASubjek: ${subject}%0APesan: ${message}`;

  // Ganti dengan nomor WA tujuan (format internasional tanpa +)
  const phoneNumber = "6287871444469";
  const url = `https://wa.me/${phoneNumber}?text=${text}`;

  window.open(url, "_blank");
});
