import MediaPicker from './MediaPicker';

export default class {
    constructor() {
        $('.image-picker').on('click', (e) => {
            this.pickImage(e);
        });

        $('.vce-picker').on('click', (e) => {
            this.pickVce(e);
        });

        this.sortable();
        this.removeImageEventListener();
    }

    pickImage(e) {
        let inputName = e.currentTarget.dataset.inputName;
        let multiple = e.currentTarget.hasAttribute('data-multiple');

        let picker = new MediaPicker({ type: 'image', multiple });

        picker.on('select', (file) => {
            this.addImage(inputName, file, multiple, e.currentTarget);
        });
    }

    pickVce(e) {
        let inputName = e.currentTarget.dataset.inputName;
        let multiple = e.currentTarget.hasAttribute('data-multiple');

        let picker = new MediaPicker({ type: 'vce', multiple });

        picker.on('select', (file) => {
            this.addFile(inputName, file, multiple, e.currentTarget);
        });
    }

    addImage(inputName, file, multiple, target) {
        let html = this.getTemplate(inputName, file);

        if (multiple) {
            let multipleImagesWrapper = $(target).next('.multiple-images');

            multipleImagesWrapper.find('.image-holder.placeholder').remove();
            multipleImagesWrapper.find('.image-list').append(html);
        } else {
            $(target).siblings('.single-image').html(html);
        }
    }

    addFile(inputName, file, multiple, target) {
        let html = this.getFileTemplate(inputName, file);
        let multipleImagesWrapper = $(target).next('.multiple-files')
        multipleImagesWrapper.find('.file-list').append(html);
    }

    getTemplate(inputName, file) {
        return $(`
            <div class="image-holder">
                <img src="${file.path}">
                <button type="button" class="btn remove-image"></button>
                <input type="hidden" name="${inputName}" value="${file.id}">
            </div>
        `);
    }

    getFileTemplate(inputName, file) {
        return $(`
            <li class="public-resource">${file.filename}<button type="button" class="close remove-public-resource" data-input-name="${inputName}">&times;</button><input type="hidden" name="${inputName}" value="${file.id}"></li>
        `);
    }

    sortable() {
        let imageList = $('.image-list');

        if (imageList.length > 0) {
            Sortable.create(imageList[0], { animation: 150 });
        }
    }

    removeImageEventListener() {
        $('.image-holder-wrapper').on('click', '.remove-image', (e) => {
            e.preventDefault();

            console.log(e.currentTarget.dataset);
            let imageHolderWrapper = $(e.currentTarget).closest('.image-holder-wrapper');

            if (imageHolderWrapper.find('.image-holder').length === 1) {
                imageHolderWrapper.html(
                    this.getImagePlaceholder(e.currentTarget.dataset.inputName)
                );
            }

            $(e.currentTarget).parent().remove();
        });

        $('.remove-public-resource').on('click', (e) => {
            e.preventDefault();
            $(e.currentTarget).closest('.public-resource').remove();
        });
    }

    getImagePlaceholder(inputName) {
        return `
            <div class="image-holder placeholder cursor-auto">
                <i class="fa fa-picture-o"></i>
                <input type="hidden" name="${inputName}">
            </div>
        `;
    }
}
