const { registerBlockType } = wp.blocks;
const { withSelect } = wp.data;
const { apiFetch } = wp.apiFetch;

let authorName = "";

registerBlockType("startertheme/lastposts", {
  title: "Derniers articles",
  category: "widgets",
  supports: {
    html: false,
  },
  edit: withSelect((select) => {
    return {
      posts: select("core").getEntityRecords("postType", "post", {
        per_page: 3,
      }),
    };
  })(({ posts, className }) => {
    if (!posts) {
      return <p className={className}>Loadding...</p>;
    }
    if (posts.lenght === 0) {
      return <p className={className}>Pas d'article</p>;
    }

    return (
      <div className={className}>
        {posts.map((post) => {
          wp.apiFetch({ path: `/wp/v2/users/${post.author}` }).then((data) => {
            authorName = data.name;
          });

          return (
            <p>
              <img src={post.fimg_url} width="200px" />
              <br></br>
              <i>
                Par {authorName} | {post.date}
              </i>
              <h5>{post.title.rendered.replace("&rsquo;", "'")}</h5>
            </p>
          );
        })}
      </div>
    );
  }),
  save() {
    return null;
  },
});
