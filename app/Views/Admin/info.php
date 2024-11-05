
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.1/dist/css/datepicker-bs5.min.css">
<div class="container">

    <input type="hidden" id="userId" value="<?= session()->get('user_id') ?>"/>
    <div class="row">
        <div class="col-6">
            <h2>Statistiques</h2>
        </div>
        <div class="col-6">
            <select id="application">
            </select> 
        </div>

    </div>
    <form class="row" id="dateRange">
        <label for="startDate" class="col-2 col-form-label">Date du</label>
        <div class="col-2">
        <div class="input-group date" id="datepicker_startDate">
            <input type="text" class="form-control" id="startDate"/>
        </div>
        </div>
        <label for="endDate" class="col-1 col-form-label">au</label>
        <div class="col-2">
        <div class="input-group date" id="datepicker_endDate">
            <input type="text" class="form-control" id="endDate"/>
        </div>
        </div>
    </form>

    <stats-chart key="device-type"></stats-chart>

</div>

<script src="<?= base_url() ?>/assets/js/chartjs/chart.umd.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker-full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/fr.js"></script>
<script>
    const elem = document.getElementById('dateRange');
    const datepicker = new DateRangePicker(elem, {
        buttonClass: 'btn',
        language: 'fr',
    });
    $(elem).on('changeDate', (event) => {
        const startDateYmd = convertDate('#startDate');
        const endDateYmd = convertDate('#endDate');
        const appId = $('#application').val();
        $('stats-chart').get(0).setDates( {
            startDate: startDateYmd, 
            endDate: endDateYmd, 
            app: appId,
        });
    });

    function convertDate(inputSelector){
        const valueArray = $(inputSelector).val().split('/');
        return valueArray.reverse().join('-');
    }

    function getApplications(){
        const userId = $('#userId').val();
        if(userId){
            $.get('<?= base_url() ?>/Generated/Application/Listapplicationsjson/findBy_owner/' + userId, 
                (result)=> {
                    fillOptions(result.data);
                });
        }else{
            $.get('<?= base_url() ?>/Generated/Application/Listapplicationsjson/findLike_name/%',
                (result)=> {
                    fillOptions(result.data);
                });
        }

        function fillOptions(data){
            $('#application').empty();
            for (const app of data) {
                $(`<option value="${app.id}">${app.name}</option>`).appendTo($('#application'))
            }

        }
    }
    getApplications();
</script>
<script type="module">
    import StatsCountryElement from '<?= base_url() ?>/assets/js/webComponents/stat-country.js';
</script>
