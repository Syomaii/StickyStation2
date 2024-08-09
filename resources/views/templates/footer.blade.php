
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <h5>Company</h5>
                <p>About Us</p>
                <p>Careers</p>
                <p>Press</p>
            </div>
            <div class="col-md-3 mb-3">
                <h5>Useful Links</h5>
                <p><a href="/" class="text-white">Home</a></p>
                <p><a href="/products" class="text-white">Products</a></p>
                <p><a href="#" class="text-white">Services</a></p>
                <p><a href="#" class="text-white">Contact Us</a></p>
            </div>
            <div class="col-md-3 mb-3">
                <h5>Contact Us</h5>
                <p>Email: chrischanjay29@gmail.com</p>
                <p>Phone: +09924821214</p>
                <p>Address: Pagsabungan, Mandaue City, Cebu</p>
            </div>
            <div class="col-md-3 mb-3">
                <h5>Follow Us</h5>
                <div class="d-flex">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p>&copy; {{ date('Y') }} StickyStation. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script>
    function togglePassword(fieldId) {
        var passwordInput = document.querySelector(fieldId);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</body>
</html>