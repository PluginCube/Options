<script>
    export let style = null;
    export let disabled = false;
</script>

<style>
    button {
        height: 34px;
        text-align: center;
        transition: all 0.2s;
        border-radius: 3px;
        font-size: 12px;
        background: var(--cf-primary-text);
        color: #fff;
        padding: 0px 12px;
        border: none;
        cursor: pointer;
        outline: none;
    }

    button:disabled {
        cursor: auto;
        opacity: 0.6;
    }
</style>

<button on:click {disabled} {style}>
    <slot>Text Here</slot>
</button>