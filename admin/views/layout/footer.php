</main>
<!--begin::Footer-->



<footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Anything you want</div> <!--end::To the end--> <!--begin::Copyright--> <strong>
                Nhom-3 &copy; 2024-2025&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer> <!--end::Footer--><!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?= BASE_URL_ADMIN . "/assets" ?>/dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->

    <!-- // Xử lí js trang list -->
    <script>
        const delete_checkeds =document.getElementsByClassName('delete_checked')
        const inputs = document.getElementsByName('id[]');

        
        inputs.forEach(input => {
            let tr = input.parentElement.parentElement
            tr.addEventListener("click",()=>{
                input.checked == true ?  input.checked = false : input.checked = true
                input.checked == true ? tr.classList.add("table-warning") : tr.classList.remove("table-warning")
            })
            input.addEventListener("click",(e)=>{
                input.checked == true ?  input.checked = false : input.checked = true
                // e.preventDefault();
            })
        });

        const chonTatCa = ()=>{
            inputs.forEach(function(element, key) {
                element.checked = true;
                element.parentElement.parentElement.classList.add("table-warning") 
            });
        }
        const boChonTatCa = ()=>{
            inputs.forEach(function(element, key) {
                element.checked = false;
                element.parentElement.parentElement.classList.remove("table-warning")
            });
        }
        

        // Sử lí sự kiện xóa hiện modal
        var buttons = document.querySelectorAll('button[data-bs-toggle="modal"]');
        var modalLink = document.getElementById('modalLink');
        var form =document.getElementById("form");
        // console.log(form);
        
        // Thêm sự kiện cho từng nút
        buttons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Lấy đường link từ thuộc tính data-link
                var link = button.getAttribute('data-link');
                // Cập nhật href của nút trong modal
                if (link == 'deleteAll' ) {   
                    modalLink.addEventListener("click",function(){
                        form.submit();
                        showToast();
                    }) 
                    // console.log('Có deleteAll');
                    
                }else{
                    modalLink.setAttribute('href', link);
                    // modalLink.addEventListener("click",(e)=>{
                    //     e.preventDefault()
                    //     window.location.href = modalLink.href;
                    //     showToast()
                    // }
                        
                    // ) 
                }
            });
        });
        
        // Thông báo toast
        function showToast() {
            const toastElement = document.getElementById('customToast');
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
        }
        // showToast()
        
    </script>
    
    <!--end::Script-->
</body><!--end::Body-->

</html>