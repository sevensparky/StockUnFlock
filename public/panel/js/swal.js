function swal(title='با موفقیت انجام شد', icon='success', btnText='باشه') {
    $(document).ready(function () {
        Swal.fire({
            title: title,
            icon: icon,
            confirmButtonText: btnText,
        });
    });
}

function swalToast(title, icon, position, time = 1500) {
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true
    })

    $(document).ready(function () {
        Toast.fire({
            title: title,
            icon: icon,
        });
    });
}

function swalConfirm(className, formName) {

    $(document).ready(function () {
        let ClassName = className;
        let FormName = formName;
        let element = $('.' + ClassName);

        element.on('click', function (e){
            e.preventDefault();

            const swalWithBootstrapButton = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButton.fire({
                title: 'آیا از حذف این آیتم اطمینان دارید؟',
                text: "دیگر قادر به بازیابی این آیتم نخواهید بود!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله مشکلی نیست',
                cancelButtonText: 'بی خیال'
            }).then((result) => {
                if (result.value === true) {
                    document.getElementById(FormName).submit();
                    swal();
                }else if (result.dismiss === Swal.DismissReason.cancel){
                    swalToast('درخواست با موفقیت لغو شد','success','top-right', 2500)
                }
            })
        })
    });
}




