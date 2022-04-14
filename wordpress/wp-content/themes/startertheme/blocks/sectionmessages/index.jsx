const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, MediaUpload } = wp.blockEditor;
const { ColorPicker } = wp.components;

// COMPONENTS :

function Message({
  classNameContainer,
  src,
  classNameImg,
  placeholder,
  value,
  onChange,
}) {
  return (
    <div className={classNameContainer + " messages-editor"}>
      <RichText
        tagName="div"
        placeholder={placeholder}
        value={value}
        onChange={onChange}
      />
      <img src={src} className={classNameImg} width={"50px"} />
    </div>
  );
}

function UploadImg({ numberMsg, onSelect }) {
  return (
    <div>
      <h2>Image message {numberMsg}</h2>
      <MediaUpload
        type="image"
        onSelect={onSelect}
        render={({ open }) => <button onClick={open}>Choisir une image</button>}
      />
    </div>
  );
}

registerBlockType("startertheme/sectionmessages", {
  title: "Section avec messages",
  category: "startertheme",
  supports: {
    html: false,
  },
  edit({ className, attributes, setAttributes }) {
    // RENDER :

    return (
      <div>
        <div className={className}>
          <div className="messageOneAndTwo-container-editor">
            <Message
              classNameContainer="messageOne-container-editor"
              src={attributes.mediaOneURL}
              classNameImg="messageOne-img-editor"
              placeholder="Message 1"
              value={attributes["messageOne"]}
              onChange={(messageOne) => setAttributes({ messageOne })}
            />
            <Message
              classNameContainer="messageTwo-container-editor"
              src={attributes.mediaTwoURL}
              classNameImg="messageTwo-img-editor"
              placeholder="Message 2"
              value={attributes["messageTwo"]}
              onChange={(messageTwo) => setAttributes({ messageTwo })}
            />
          </div>
          {/* Center content */}
          <div className="main-content-center-editor">
            <h2 className="sectionmessages-section-title-editor">
              <RichText
                tagName="div"
                placeholder="Titre de la section"
                value={attributes["title"]}
                onChange={(title) => setAttributes({ title })}
              />
            </h2>
            <p>
              <RichText
                tagName="div"
                placeholder="Texte"
                value={attributes["text"]}
                onChange={(text) => setAttributes({ text })}
              />
            </p>
            <button>
              <RichText
                tagName="div"
                placeholder="Boutton"
                value={attributes["btn"]}
                onChange={(btn) => setAttributes({ btn })}
              />
            </button>
          </div>
          {/* End center content */}
          <div className="messageThreeFourAndFive-container-editor">
            <Message
              classNameContainer="messageThree-container-editor"
              src={attributes.mediaThreeURL}
              classNameImg="messageThree-img-editor"
              placeholder="Message 3"
              value={attributes["messageThree"]}
              onChange={(messageThree) => setAttributes({ messageThree })}
            />
            <Message
              classNameContainer="messageFour-container-editor"
              src={attributes.mediaFourURL}
              classNameImg="messageFour-img-editor"
              placeholder="Message 4"
              value={attributes["messageFour"]}
              onChange={(messageFour) => setAttributes({ messageFour })}
            />
            <Message
              classNameContainer="messageFive-container-editor"
              src={attributes.mediaFiveURL}
              classNameImg="messageFive-img-editor"
              placeholder="Message 5"
              value={attributes["messageFive"]}
              onChange={(messageFive) => setAttributes({ messageFive })}
            />
          </div>
        </div>
        {/* Control Dashboard */}
        <InspectorControls>
          <div className="inspector-controls-container-editor">
            <UploadImg
              numberMsg="1"
              onSelect={(imageOne) =>
                setAttributes({
                  mediaOneID: imageOne.id,
                  mediaOneURL: imageOne.sizes.full.url,
                })
              }
            />
            <UploadImg
              numberMsg="2"
              onSelect={(imageTwo) =>
                setAttributes({
                  mediaTwoID: imageTwo.id,
                  mediaTwoURL: imageTwo.sizes.full.url,
                })
              }
            />
            <UploadImg
              numberMsg="3"
              onSelect={(imageThree) =>
                setAttributes({
                  mediaThreeID: imageThree.id,
                  mediaThreeURL: imageThree.sizes.full.url,
                })
              }
            />
            <UploadImg
              numberMsg="4"
              onSelect={(imageFour) =>
                setAttributes({
                  mediaFourID: imageFour.id,
                  mediaFourURL: imageFour.sizes.full.url,
                })
              }
            />
            <UploadImg
              numberMsg="5"
              onSelect={(imageFive) =>
                setAttributes({
                  mediaFiveID: imageFive.id,
                  mediaFiveURL: imageFive.sizes.full.url,
                })
              }
            />
            <div>
              <h2>Saisissez le lien du boutton</h2>
              <RichText
                tagName="div"
                placeholder="https://..."
                value={attributes.btnLink}
                onChange={(btnLink) => setAttributes({ btnLink })}
              />
            </div>
          </div>
        </InspectorControls>
      </div>
    );
  },
  save() {
    return null;
  },
});
