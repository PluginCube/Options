<script>
    export let style = null
    export let disabled = false
</script>

<style lang="scss">
    button {
        height: 28px;
        text-align: center;
        transition: all 0.2s;
        font-size: 11px;
        background: var(--pco-primary-text);
        color: #fff;
        padding: 0px 12px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        outline: none;
        display: flex;
        justify-content: center;
        font-family: 'Nunito', sans-serif;
        align-items: center;
        font-weight: 500;

        &:disabled {
            cursor: auto;
            opacity: 0.6;
        }
    }
</style>

<button on:click {disabled} {style}>
    <slot>Text Here</slot>
</button>