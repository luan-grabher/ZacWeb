<script type="text/javascript" defer>
    $(document).ready(function () {
        $('form.ajax').submit(function (e) {
            e.preventDefault();
            var ajaxObj = new ajax();
            ajaxObj.method = $(this).attr('method');
            ajaxObj.url = $(this).attr('action');
            ajaxObj.data = $(this).serialize();
            ajaxObj.response = JSON.parse($(this).attr('response'));
            ajaxObj.call();

            return false;
        });
        $('select.ajax').change(function (e) {
            try {
                e.preventDefault();
                var jsonOptions = JSON.parse($(this).attr('json')); // Local to response

                var ajaxObj = new ajax();
                ajaxObj.method = jsonOptions.method;
                ajaxObj.url = jsonOptions.url.replace('*value*',this.value);
                ajaxObj.data = this.value;
                ajaxObj.response = jsonOptions.response;
                ajaxObj.call();
            } catch (e) {
                console.log(e);
            }

        });


        $("body").on('click','a.ajax',function (e) {
            e.preventDefault();

            try {
                var jsonOptions = JSON.parse($(this).attr('json')); // Local to response

                var ajaxObj = new ajax();
                ajaxObj.method = jsonOptions.method;
                ajaxObj.url = $(this).attr('href');
                ajaxObj.data = jsonOptions.data;
                ajaxObj.response = jsonOptions.response;
                ajaxObj.call();
            } catch (e) {
                console.log(e);
            }
            return false;
        });


        updateSelects();
    });

    function ajax() {
        this.method = "POST";
        this.url = "#";
        this.data = [];
        this.response = [];
        let ff = this;
        this.call = function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: ff.method,
                url: ff.url,
                data: ff.data,
                cache: false,
                beforeSend: function () {
                    console.log('send: ', ff.data);
                },
                success: function (data) {
                    try {
                        if (ff.response.type === "html") {
                            $(ff.response.selector).html(data);
                        } else if (ff.response.type === "options") {
                            $(ff.response.selector).append('<option>{{__('Never option selected')}}</option>');
                            $.each(data, function (key, value) {
                                $(ff.response.selector).append('<option value=' + key + '>' + value + '</option>');
                            });

                        } else if (ff.response.type === "table") {
                            $.each(data, function (key, value) {
                                $(ff.response.selector).append('<option value=' + key + '>' + value + '</option>');
                            });
                        } else if (ff.response.type === "message") {
                            alert(data);
                        } else if (ff.response.type === "console") {
                            console.log(data);
                        }
                    } catch (e) {
                        console.log("Ajax Error: ", e);
                    }
                },
                error: function (e) {
                    console.log("Ajax send error: ", e);
                }
            });
        }
    }

    /*Atualizar selects*/
    function updateSelects() {
        var ajaxObj = new ajax();

        /*Users*/
        ajaxObj.method = "GET";
        ajaxObj.url = '{{route('usersGetAll')}}';
        ajaxObj.response = {type: "options", selector: ".options-user"};
        ajaxObj.call();
    }

</script>
