import {LitElement, html} from '../lit/lit-all.min.js';

const setup = async () => {

    class StatsChartElement extends LitElement {
        static properties = { 
            key: {type: String},
        };

        static get styles() { };

        constructor() {
            super();
            this.startDate = "2000-01-01";
            this.endDate = "2024-01-02";
            this.app = undefined;
        }

        /**
         * Don't use the shadow-root node. The "styles" property will not be used.
         * @returns 
         */
        createRenderRoot() {
            return this;
        }

        firstUpdated(changedProperties) {
            this.getStats().then((data) => {
                const chartConfig = {
                    type: 'pie',
                    data: data,
                    options: {
                      responsive: true,
                      plugins: {
                      }
                    },
                };
                this.chart = new Chart(document.getElementById(this.canvasId), chartConfig);
                this.updateEmptyState();
            });
        }

        render() {
            this.canvasId = `chart-${this.app}-${this.key}`;
            return html`
                <canvas id="${this.canvasId}"></canvas>
                <div id="no-data" style="display:none">Aucune donnée</div>
            `;
        }

        setDates(conf){
            this.startDate = conf.startDate;
            this.endDate = conf.endDate;
            this.app = conf.app;
            this.getStats().then((newDataset) => {
                this.chart.config.data = newDataset
                this.chart.update();
                this.updateEmptyState();
            });
        }
        updateEmptyState(){
            if(this.chart.config.data.datasets[0].data.length > 0){
                $(this).find('#no-data').hide();
            }else{
                $(this).find('#no-data').show();
            }
        }

        getStats(){
            return new Promise((resolve)=>{
                var filteredData = {
                    labels: [],
                    datasets: [{
                        data: []
                    }]
                };
                if(this.app === undefined){
                    resolve(filteredData);
                    return 
                }
                $.get(base_url() + '/Admin/Stats/index/' + this.app + '/' + this.startDate + '/' + this.endDate, 
                (result)=> {
                    var counter = [];
                    for (const item of result.data) {
                        var data = JSON.parse(item.detail);
                        if(! filteredData.labels.includes(data[this.key])){
                            filteredData.labels.push(data[this.key]);
                            counter[data[this.key]] = 0;
                        }
                        counter[data[this.key]] = counter[data[this.key]] + 1;
                    }
                    for(const label of filteredData.labels){
                        filteredData.datasets[0].data.push(counter[label]);
                    }
                    resolve(filteredData);
                });
            });
        }

    }

    // Register component
    customElements.define('stats-chart', StatsChartElement);

    return StatsChartElement;
};

export default await setup();