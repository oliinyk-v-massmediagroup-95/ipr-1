<template>
    <v-form ref="productForm">
        <v-row>
            <v-col cols="6">
                <v-text-field
                    label="Title"
                    name="title"
                    v-model="productData.title"
                    :rules="validation.title"
                />

                <v-text-field
                    :rules="validation.sizes"
                    v-model="productData.sizes"
                    label="Sizes"
                    name="sizes"
                />

                <v-text-field
                    name="cost"
                    type="number"
                    label="Cost"
                    v-model="productData.cost"
                    :rules="validation.cost"
                />

                <v-text-field
                    name="weight"
                    type="number"
                    label="Weight"
                    v-model="productData.weight"
                    :rules="validation.weight"
                />

                <v-textarea
                    name="description"
                    label="Description"
                    v-model="productData.description"
                    :rules:="validation.description"
                    filled
                    rows="3"
                />
            </v-col>

            <v-col cols="6" class="px-10">
                <v-file-input
                    name="img"
                    label="Image"
                    accept=".png,.jpeg,.jpg"
                    v-model="productData.img"
                    @change="onFileSelect"
                />

                <div class="pt-6">
                    <img v-if="imageSrc" :src="imageSrc" alt="product img" width="100%"/>
                    <img v-else :src="notFoundImage" alt="product img" width="100%"/>
                </div>

            </v-col>
        </v-row>
    </v-form>
</template>
<script>
import {required, number, min, max, minNumber, size} from "../../../../data/validation/vuetify-validation";
import {notFoundImage} from "../../../../data/constants/shared";
import {objectToFormData} from "../../../../data/helpers/helpers";

export default {
    props: {
        product: {
            type: Object,
            default: () => {
            },
        }
    },
    data: () => ({
        fileReader: null,
        imageSrc: '',
        notFoundImage,

        productData: {
            title: '',
            cost: 0,
            weight: 0,
            sizes: '0x0',
            img: null,
            description: ''
        },

        validation: {
            title: [required, min, max],
            cost: [required, number, minNumber],
            weight: [required, number, minNumber],
            sizes: [required, size],
            img: [],
            description: []
        }
    }),
    beforeMount() {
        this.prepareFileReader();
        this.fillProductData(this.product);
    },
    methods: {
        async submitForm() {
            const valid = this.$refs.createProduct.validate();

            if (valid) {
                const productData = objectToFormData(this.productData);

                this.$emit('submit', {
                    formData: productData
                });
            }
        },

        fillProductData(data) {
            for(let key in data) {
                if(this.productData[key] !== undefined) {
                    this.productData[key] = data[key];
                }
            }
        },

        prepareFileReader() {
            this.fileReader = new FileReader();
            this.fileReader.onload = (e) => this.changeImage(e.target.result)
        },

        changeImage(src) {
            this.imageSrc = src;
        },

        onFileSelect(file) {
            this.fileReader.readAsDataURL(file);
        }
    },
    destroyed() {
        this.fileReader = null;
    }
}
</script>
