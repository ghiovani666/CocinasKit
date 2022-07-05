// ::::::::::::::::: FILE 1 :::::::::::::::::::::::::::
$("#file1").change(function (event) {
    RecurFadeIn_1();
    readURL_1(this);
});
$("#file1").on('click', function (event) {
    RecurFadeIn_1();
});

function readURL_1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#file1").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function (e) {
            //   debugger;      
            $('#blah_1').attr('src', e.target.result);
            $('#blah_1').hide();
            $('#blah_1').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn_1() {
    console.log('ran');
    FadeInAlert_1("Wait for it...");
}

function FadeInAlert_1(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}


// ::::::::::::::::: FILE 2 :::::::::::::::::::::::::::
$("#file2").change(function (event) {
    RecurFadeIn_2();
    readURL_2(this);
});
$("#file2").on('click', function (event) {
    RecurFadeIn_2();
});

function readURL_2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#file2").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function (e) {
            //   debugger;      
            $('#blah_2').attr('src', e.target.result);
            $('#blah_2').hide();
            $('#blah_2').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn_2() {
    console.log('ran');
    FadeInAlert_2("Wait for it...");
}

function FadeInAlert_2(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}



// ::::::::::::::::: FILE 3 :::::::::::::::::::::::::::
$("#file3").change(function (event) {
    RecurFadeIn_3();
    readURL_3(this);
});
$("#file3").on('click', function (event) {
    RecurFadeIn_3();
});

function readURL_3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#file3").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function (e) {
            //   debugger;      
            $('#blah_3').attr('src', e.target.result);
            $('#blah_3').hide();
            $('#blah_3').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn_3() {
    console.log('ran');
    FadeInAlert_3("Wait for it...");
}

function FadeInAlert_3(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}



// ::::::::::::::::: FILE 4 :::::::::::::::::::::::::::
$("#file4").change(function (event) {
    RecurFadeIn_4();
    readURL_4(this);
});
$("#file4").on('click', function (event) {
    RecurFadeIn_4();
});

function readURL_4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#file4").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function (e) {
            //   debugger;      
            $('#blah_4').attr('src', e.target.result);
            $('#blah_4').hide();
            $('#blah_4').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn_4() {
    console.log('ran');
    FadeInAlert_4("Wait for it...");
}

function FadeInAlert_4(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}



// ::::::::::::::::: FILE 5 :::::::::::::::::::::::::::
$("#file5").change(function (event) {
    RecurFadeIn_5();
    readURL_5(this);
});
$("#file5").on('click', function (event) {
    RecurFadeIn_5();
});

function readURL_5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#file5").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function (e) {
            //   debugger;      
            $('#blah_5').attr('src', e.target.result);
            $('#blah_5').hide();
            $('#blah_5').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn_5() {
    console.log('ran');
    FadeInAlert_5("Wait for it...");
}

function FadeInAlert_5(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}
