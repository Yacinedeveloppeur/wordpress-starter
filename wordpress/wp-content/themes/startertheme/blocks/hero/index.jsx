const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, MediaUpload } = wp.blockEditor;
const { ColorPicker } = wp.components;

registerBlockType("startertheme/hero", {
  title: "Hero",
  category: "widgets",
  supports: {
    html: false,
  },
  edit({ className, attributes, setAttributes }) {
    return (
      <div>
        <div className={className} style={{ color: attributes.color }}>
          <div className="hero-container-editor">
            <div className="first-block-hero-editor">
              <h2>
                <RichText
                  tagName="div"
                  placeholder="Titre du héro"
                  value={attributes.title}
                  onChange={(title) => setAttributes({ title })}
                />
              </h2>
              <RichText
                tagName="div"
                placeholder="Texte du héro"
                value={attributes.content}
                onChange={(content) => setAttributes({ content })}
              />
              <span>
                {" "}
                <div className="btn-container-editor">
                  <button className="default-btn-editor">
                    <RichText
                      tagName="div"
                      placeholder="Texte du boutton"
                      value={attributes.firstBtn}
                      onChange={(firstBtn) => setAttributes({ firstBtn })}
                    />
                  </button>

                  <button className="default-btn-editor">
                    <RichText
                      tagName="div"
                      placeholder="Texte du boutton"
                      value={attributes.secondBtn}
                      onChange={(secondBtn) => setAttributes({ secondBtn })}
                    />
                  </button>
                </div>
              </span>
            </div>
            <div className="second-block-hero-editor">
              <div
                className="right-hero-image-editor"
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
                <h2>Choisissez la couleur du texte</h2>
                <ColorPicker
                  color={attributes.color}
                  onChangeComplete={(color) =>
                    setAttributes({ color: color.hex })
                  }
                  disableAlpha
                />
              </div>
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
              <div>
                <h2>Saisissez le lien du premier boutton</h2>
                <RichText
                  tagName="div"
                  placeholder="https://..."
                  value={attributes.firstBtnLink}
                  onChange={(firstBtnLink) => setAttributes({ firstBtnLink })}
                />
              </div>
              <div>
                <h2>Saisissez le lien du second boutton</h2>
                <RichText
                  tagName="div"
                  placeholder="https://..."
                  value={attributes.secondBtnLink}
                  onChange={(secondBtnLink) => setAttributes({ secondBtnLink })}
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
