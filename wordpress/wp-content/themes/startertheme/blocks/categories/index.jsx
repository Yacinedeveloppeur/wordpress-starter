const { registerBlockType } = wp.blocks;
const { withSelect } = wp.data;
const { apiFetch } = wp.apiFetch;
const { RichText, InspectorControls, MediaUpload } = wp.blockEditor;

let authorName = "";
let categories = "";

registerBlockType("startertheme/categories", {
  title: "Catégories",
  category: "widgets",
  supports: {
    html: false,
  },
  edit: withSelect((select) => {
    categories = select("core").getEntityRecords("taxonomy", "category");
    return {
      categories: categories,
    };
  })(({ className, attributes, setAttributes }) => {
    if (!categories) {
      return <p className={className}>Loadding...</p>;
    }
    if (categories.lenght === 0) {
      return <p className={className}>Pas de catégorie</p>;
    }

    return (
      <div className={className}>
        <h2 className="categories-section-title-editor">
          <RichText
            tagName="div"
            placeholder="Titre de la section"
            value={attributes.title}
            onChange={(title) => setAttributes({ title })}
          />
        </h2>
        <div className="categories-cards-container-editor">
          {categories.map((category) => {
            if (category.name != "Non classé")
              return (
                <div class="categories-card-editor">
                  <div className="categories-icon-container-editor">
                    <img
                      src={attributes.mediaURL}
                      className="categories-icon-editor"
                    />
                  </div>
                  <h4>{category.name}</h4>
                  <p>{category.description}</p>
                </div>
              );
          })}
        </div>{" "}
        <InspectorControls>
          <div className="inspector-controls-container-editor">
            <div>
              <h2>Image à droite</h2>
              <MediaUpload
                type="image"
                onSelect={(image) =>
                  setAttributes({
                    mediaID: image.id,
                    mediaURL: image.sizes.full.url,
                  })
                }
                render={({ open }) => (
                  <button onClick={open}>Choisir une image</button>
                )}
              />
            </div>
          </div>
        </InspectorControls>
      </div>
    );
  }),
  save() {
    return null;
  },
});
