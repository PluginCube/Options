<script>
    export let value
    export let args
    
    import merge from 'deepmerge'

    $: args = merge(
        {
            attributes: {},
        },
        args
    )

    $: if (!value) {
        value = 0
    }

    $: if (typeof value == 'string') {
        value = parseInt(value)
    }

    let increase = () => {
        value = value + 1
    }

    let decrease = () => {
        value = value - 1
    }
</script>

<style lang="scss">
    div {
        position: relative;
        float: left;
        border: var(--pco-control-border) !important;
        box-shadow: var(--pco-box-shadow) !important;
        border-radius: var(--pco-border-radius);
        overflow: hidden;

        input {
            width: 85px;
            max-width: 100%;
            padding: 5px 12px;
            font-size: 13px;
            border: none;
            box-shadow: none;
            border-radius: 0px;
            margin: 0;

            &::-webkit-inner-spin-button {
                opacity: 0;
            }
        }

        i {
            float: left;
            font-size: 15px;
            position: absolute;
            right: -1px;
            width: 20px;
            text-align: center;
            border: 1px solid #eee;
            cursor: pointer;

            &:hover {
                background: #f1f4f6;
            }

            &:first-of-type {
                top: -1px;
                border-top: 0;
            }

            &:last-of-type {
                bottom: -2px;
                border-top: 0;
            }
        }
    }
</style>

<div>
    <i class="ri-arrow-drop-up-fill" on:click={increase} />
    <i class="ri-arrow-drop-down-fill" on:click={decrease} />

    <input type="number" bind:value {...args.attributes} />
</div>