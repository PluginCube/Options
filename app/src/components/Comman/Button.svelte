<script>
    export let style = null;
    export let disabled = false;
</script>

<style>
    button {
        height: 32px;
        line-height: 30px;
        text-align: center;
        border-radius: 5px;
        font-size: 12px;
        margin-top: 85px;
        float: left;
        background: var(--cf-primary-text);
        color: #fff;
        padding: 0px 5px;
        border: none;
        cursor: pointer;
    }

    button:disabled {
        cursor: auto;
        background: var(--cf-secondary-text);
    }
</style>

<button on:click {disabled} {style}>
    <slot>Text Here</slot>
</button>