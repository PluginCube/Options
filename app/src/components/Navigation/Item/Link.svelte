<script>
    export let title
    export let icon
    export let url
</script>

<li>
    <a href={url} target="_blank">
        <i class={icon}></i>
        {title}
    </a>
</li>