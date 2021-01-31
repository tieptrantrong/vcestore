export default class {
    constructor() {
        this.optionsCount = 0;

        this.addOptions(FleetCart.data['product.privateUrlProducts']);

        if (this.optionsCount === 0) {
            this.addOption();
        }

        if (this.optionsCount > 3) {
            this.collapseOptions();
        }

        $('#add-new-private-product').on('click', () => this.addOption());
    }

    addOptions(options) {
        for (let option of options) {
            this.addOption(option);
        }
    }

    collapseOptions() {
        let options = $('.option:not(.option-has-errors)');

        for (let option of options) {
            $(option).find('[data-toggle=collapse]').trigger('click');
        }
    }

    addOption(option = { id: null, product_id: null, url: null }) {
        let optionId = this.optionsCount;
        let template = _.template($('#private-product-template').html());
        let html = $(template({ option, optionId }));

        if (option.url !== null) {
            setTimeout(() => {
                $(`#product-${optionId}`).find('#product-url').text(option.url);
            });
        }

        let optionGroup = $('#private-product-group').append(html);

        if (! optionGroup.is('.sortable')) {
            //super.makeSortable(optionGroup[0]);

            optionGroup.addClass('sortable');
        }

        this.deleteOptionEventListener(html);
        this.updateOptionNameEventListener(optionId);
        this.updateTemplateEventListener(optionId, option['values']);

        window.admin.tooltip();

        this.optionsCount++;
    }

    deleteOptionEventListener(option) {
        option.find('.delete-option').on('click', (e) => $(e.currentTarget).closest('.option').remove());
    }

    updateOptionNameEventListener(optionId) {
        let option = $(`#product-${optionId}`);
        let old = option.find('#product-url').text();

        $(option).find('.product-url-field').on('input', (e) => {
            let name = e.currentTarget.value !== '' ? e.currentTarget.value : old;

            option.find('#product-url').text(name);
        });
    }

    updateTemplateEventListener(optionId, values = []) {
        let optionTypeElement = $(`#product-${optionId}-type`);

        optionTypeElement.on('change', (e) => {
            let type = e.currentTarget.value;

            if (type === '') {
                return this.getOptionValuesElement(optionId).html('');
            }

            //super.changeOptionType({ optionId, type, values });
        });

        // Trigger the "change" event on option type after attaching the listener
        // this will automatically take effect of the current option which is
        // maybe loaded from the old input values or from the product data.
        optionTypeElement.trigger('change');
    }

    addOptionRow({ optionId, valueId, value = { label: '', price: '', price_type: 'fixed' } }) {
        let template = this.getRowTemplate({ optionId, valueId, value });

        let selectValues = $(`#product-${optionId}-select-values`).append(template);

        //super.initOptionRow(template, selectValues);
    }

    addOptionRowEventListener(optionId) {
        $(`#product-${optionId}-add-new-row`).on('click', () => {
            let valueId = $(`#product-${optionId}-values .option-row`).length;

            this.addOptionRow({ optionId, valueId });
        });
    }

    getOptionValuesElement(optionId) {
        return $(`#product-${optionId}-values`);
    }

    getAddNewRowButton(optionId) {
        return $(`#product-${optionId}-add-new-row`);
    }

    getInputFieldForErrorKey(key) {
        let keyParts = key.split('.');

        // Remove the first element which is "option".
        keyParts.shift();

        // Replace all "_" to "-".
        keyParts = keyParts.map(k => {
            return k.split('_').join('-');
        });

        return $(`#product-${keyParts.join('-')}`);
    }
}
