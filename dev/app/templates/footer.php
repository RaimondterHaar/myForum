<meta name="footer" content="footer screen esp diy">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="footer grid-cols-1 sm:grid-cols-2 text-white w-screen">
    <!--footer-->
        <div class="grid pt-4 place-items-center">
<!--            <a href="https://wa.me/31645494587?text=EdpDIY">-->
                <img src="../../img/ChatOnWhatsAppButton/WhatsAppButtonGreenLarge.svg" class="text-white" onclick="openWhatsApp()"></img>
<!--            </a>-->
            <p><i class="fa fa-copyright" aria-hidden="true"></i> by RHDevelopment</p>
        </div>
        <div class="pt-4">
            <p>Subscribe for ESP updates!</p>
            <label><input type="email" value="Enter your email here" class="subscribe-text subscribe-text-input w-full rounded-lg sm:max-w-screen-sm"/></label>
            <label><input type="button" value="Subscribe" class="subscribe-text button mt-2 rounded-lg px-2 text-[#022f46]" margin-top="1rem"></label>
        </div>
</div>
<script>
    function openWhatsApp() {
        window.open('whatsapp://send?"text"=espdiy');
    }
</script>