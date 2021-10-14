export default {
    inheritAttrs: false,
    data() {
        return {
            hasErrors: false,
            default: () => {
                return this.errors.length > 0;
            }
        }
    },
    props: {
        label: {
            type: [String, Number],
            default: ''
        },
        rules: {
            type: [String, Object],
            default: ''
        },
        name: {
            type: String,
            default: ''
        },
        help: {
            type: String,
            default: ''
        },
        errors: {
            type: [Array, String],
            default: () => [],
        },
        showErrors: {
            type: Boolean,
            default: true,
        },
        showLeadingErrorIcon: {
            type: Boolean,
            default: true,
        },

        // Layout for the field, above, inline, etc
        layout: {
            type: [String],
            default: 'default',
            required: false,
            validate: (rowStyle) => {
                return ['default', 'content', 'standard', 'naked'].includes(rowStyle)
            },
        },

        // Defines if a form has a field above or bellow
        grouped: {
            type: [String],
            default: undefined,
            required: false,
            validate: (grouped) => {
                return ['bellow', 'above'].includes(grouped)
            },
        }
    },
    computed: {
        classesForButtonHasGroupAbove() {
            return this.grouped === 'above' ? 'rounded-none rounded-b-md focus:z-10' : ''
        },
        classesForButtonHasGroupBellow() {
            return this.grouped === 'bellow' ? 'rounded-none rounded-t-md focus:z-10' : ''
        }
    },
    watch: {
        modelValue: {
            handler: function (value, oldValue) {
                // This ensures the state is cleared when the user changes the input
                if (value !== oldValue && value !== '') {
                    this.hasErrors = false;
                }
            }
        },
        errors: {
            immediate: true,
            handler: function (value) {
                this.hasErrors = !!value.length;
            }
        },
    },
    methods: {
        onClickLabel(){
            this.$refs.input.focus()
        }
    }
}
