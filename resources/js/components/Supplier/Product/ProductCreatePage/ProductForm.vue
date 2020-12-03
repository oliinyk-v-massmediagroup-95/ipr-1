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

                <v-btn
                    depressed
                    x-large
                    class="primary"
                    @click="submitForm"
                >
                    {{ buttonText }}
                </v-btn>
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
                    <img v-else :src="notFoundImage" alt="not found" width="100%" />
                </div>

            </v-col>
        </v-row>
    </v-form>
</template>
<script>
import Product from "../../../../model/product";
import {notFoundImage} from "../../../../data/constants/shared";

export default {
    props: {
        product: {
            type: Object,
            required: false,
        },
        buttonText: {
            type: String,
            required: true,
        },
    },

    data: () => ({
        fileReader: null,
        imageSrc: '',
        notFoundImage,

        productData: {
            ...Product.createNew()
        },

        validation: {
            ...Product.validationRules()
        }
    }),

    beforeMount() {
        this.prepareFileReader();

        if(this.product) {
            this.fillProductData(this.product);
        }
    },

    methods: {
        async submitForm() {
            const valid = this.$refs.productForm.validate();

            if (valid) {
                this.$emit('submit', Product.toFormData(this.productData));
            }
        },

        fillProductData(product) {
            this.productData = new Product(product);

            this.changeImage(this.productData.img);
            this.productData.img = null;
        },

        prepareFileReader() {
            this.fileReader = new FileReader();
            this.fileReader.onload = (e) => this.changeImage(e.target.result)
        },

        changeImage(src) {
            this.imageSrc = src;
        },

        onFileSelect(file) {
            if(file) {
                this.fileReader.readAsDataURL(file);
            }else{
                this.changeImage(notFoundImage);
            }
        }
    },

    destroyed() {
        this.fileReader = null;
    }
}
</script>
