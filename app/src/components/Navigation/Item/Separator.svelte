<script>
    export let title
</script>

<style lang="scss">
    li {
        span {
            margin-top: 17px;
            float: left;
            width: 100%;
            margin-bottom: 10px;
            color: #a2a2a2;
            padding-left: 8px;
            font-size: 12px;
        }

        &:first-child span {
            margin-top: 0;
        }
    }
</style>

<li><span>{title}</span></li>