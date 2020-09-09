<script>
    export let value;
    export let options;

    let increase = () => {
        value = value + 1;
    }

    let decrease = () => {
        value = value - 1;
    }
</script>

<style lang="scss">
    div {
        position: relative;
        float: left;
        border: var(--cf-control-border) !important;
        box-shadow: var(--cf-box-shadow) !important;
        border-radius: var(--cf-border-radius);
        overflow: hidden;

        input {
            width: 85px;
            max-width: 100%;
            padding: 4px 12px;
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
            background: #f8f8f8;
            width: 20px;
            text-align: center;
            border: 1px solid #eee;
            cursor: pointer;

            &:hover {
                background: #f1f4f6;
            }

            &:first-of-type{
                top: -1px;
            }

            &:last-of-type {
                bottom: -3px;
            }
        }
    }
</style>

<div>
    <i class="ri-arrow-drop-up-fill" on:click={increase}></i>
    <i class="ri-arrow-drop-down-fill" on:click={decrease}></i>
    
    <input type="number" bind:value {...options}>
</div>
