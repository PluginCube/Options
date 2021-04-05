<script>
    export let small = null
    export let style = null
    export let disabled = false
    export let type = "button"
</script>

<style lang="scss">
    button {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 11px;
        min-height: 30px;
        margin: 0;
        padding: 0 12px;
        cursor: pointer;
        border-width: 0px;
        border-radius: 5px;
        white-space: nowrap;
        box-sizing: border-box;
        background: var(--pco-button-bg);
        color: var(--pco-button-text);
        font-weight: 500;

        &.pco-button-small {
            min-height: 28px;
            font-size: 11px;
            padding: 0 10px;
        }

        &:disabled {
            cursor: auto;
            opacity: 0.6;
        }
    }
</style>

<button on:click {disabled} {style} class:pco-button-small={small} {type}>
    <slot>Text Here</slot>
</button>