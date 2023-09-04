<!-- Modal -->
<div class="modal fade bottom" id="cookieConsentModal" tabindex="-1" aria-labelledby="cookieConsentModal" aria-modal="true" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-frame modal-bottom">
        <div class="modal-content rounded-0">
            <div class="modal-body py-1">
                <div class="d-flex justify-content-center align-items-center my-3">
                    <p class="mb-0 px-2">We use cookies to improve your website experience</p>
                    <button type="button" class="btn btn-primary btn-sm ms-2" data-bs-dismiss="modal" id="consentOk">Ok, thanks</button>
                    <a href="" class="btn btn-outline-primary btn-sm ms-2">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (get_cookie("site_cookie_id", true) == null) : ?>
    <script>
        $(document).ready(() => {
            setTimeout(function() {
                $('#cookieConsentModal').modal("show");
            }, 5000);

            var targetUrl = "<?php echo base_url(); ?>CookieHandler/add";
            const consentData = JSON.stringify({
                'cookie_consent': true
            });
            $("#consentOk").click(() => {
                $.ajax({
                    type: "POST",
                    url: targetUrl,
                    data: consentData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function() {
                        location.reload();
                    },
                    error: function(data) {
                        alert('Consent Failed');
                        console.log('Consent Failed', $data);
                    }
                });
            })
        });
    </script>
<?php else:  ?>
    <?= get_cookie("site_cookie_id", true) ?>
<?php endif ?>

<script>
    $(document).ready(() => {

    })
</script>