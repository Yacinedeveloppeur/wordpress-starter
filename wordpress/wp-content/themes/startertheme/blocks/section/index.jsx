const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, MediaUpload } = wp.blockEditor;
const { ColorPicker } = wp.components;

registerBlockType("startertheme/section", {
  title: "Section",
  category: "widgets",
  supports: {
    html: false,
  },
  edit({ className, attributes, setAttributes }) {
    return (
      <div>
        <div className={className}>
          <div className="section-container-editor">
            <div className="first-block-section-editor">
              <RichText
                tagName="div"
                placeholder="Texte d'introduction"
                value={attributes.intro}
                onChange={(intro) => setAttributes({ intro })}
              />
              <h2>
                <RichText
                  tagName="div"
                  placeholder="Titre de la section"
                  value={attributes.title}
                  onChange={(title) => setAttributes({ title })}
                />
              </h2>
              <RichText
                tagName="div"
                placeholder="Texte de la section"
                value={attributes.content}
                onChange={(content) => setAttributes({ content })}
              />
            </div>
            <div className="second-block-section-editor">
              <div
                className="right-section-image-editor"
                style={{
                  backgroundImage: `url(${attributes.mediaURL})`,
                  minHeight: "400px",
                }}
              ></div>
            </div>
          </div>
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
      </div>
    );
  },
  save() {
    return null;
  },
});
