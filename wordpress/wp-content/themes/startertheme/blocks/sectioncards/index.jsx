const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, MediaUpload } = wp.blockEditor;
const { ColorPicker } = wp.components;

registerBlockType("startertheme/sectioncards", {
  title: "Section avec cartes",
  category: "widgets",
  supports: {
    html: false,
  },
  edit({ className, attributes, setAttributes }) {
    const style = {
      backgroundImage: `url(${attributes.mediaURL})`,
    };

    // COMPONENTS :

    function Card({
      numberOfCard,
      titleContent,
      onChangeTitle,
      textContent,
      onChangeText,
    }) {
      return (
        <div className="sectioncards-card-editor">
          <div className="sectioncards-icon-container-editor">
            <img
              src={attributes.mediaURL}
              className="sectioncards-icon-editor"
            />
          </div>
          <h4>
            {" "}
            <RichText
              tagName="div"
              placeholder={"Titre de la carte " + { numberOfCard }}
              value={titleContent}
              onChange={onChangeTitle}
            />
          </h4>
          <p>
            <RichText
              tagName="div"
              placeholder={"Texte de la carte " + { numberOfCard }}
              value={textContent}
              onChange={onChangeText}
            />
          </p>
        </div>
      );
    }

    function LinkCard({ numberOfCard, link, onChange }) {
      return (
        <div>
          <h2>Saisissez le lien de la carte {numberOfCard}</h2>
          <RichText
            tagName="div"
            placeholder="https://..."
            value={link}
            onChange={onChange}
          />
        </div>
      );
    }

    // RENDER :

    return (
      <div>
        <div className={className}>
          <h2 className="sectioncards-section-title-editor">
            <RichText
              tagName="div"
              placeholder="Titre de la section"
              value={attributes.title}
              onChange={(title) => setAttributes({ title })}
            />
          </h2>
          <div className="sectioncards-cards-container-editor">
            <Card
              numberOfCard="1"
              titleContent={attributes.titleCardOne}
              onChangeTitle={(titleCardOne) => setAttributes({ titleCardOne })}
              textContent={attributes.textCardOne}
              onChangeText={(textCardOne) => setAttributes({ textCardOne })}
            />
            <Card
              numberOfCard="2"
              titleContent={attributes.titleCardTwo}
              onChangeTitle={(titleCardTwo) => setAttributes({ titleCardTwo })}
              textContent={attributes.textCardTwo}
              onChangeText={(textCardTwo) => setAttributes({ textCardTwo })}
            />
            <Card
              numberOfCard="3"
              titleContent={attributes.titleCardThree}
              onChangeTitle={(titleCardThree) =>
                setAttributes({ titleCardThree })
              }
              textContent={attributes.textCardThree}
              onChangeText={(textCardThree) => setAttributes({ textCardThree })}
            />
            <Card
              numberOfCard="4"
              titleContent={attributes.titleCardFour}
              onChangeTitle={(titleCardFour) =>
                setAttributes({ titleCardFour })
              }
              textContent={attributes.textCardFour}
              onChangeText={(textCardFour) => setAttributes({ textCardFour })}
            />
          </div>
          <div className="sectioncards-default-btn-editor">
            <button>
              <RichText
                tagName="div"
                placeholder="Texte du boutton"
                value={attributes.btn}
                onChange={(btn) => setAttributes({ btn })}
              />
            </button>
          </div>
        </div>

        {/* DAHSBOARD CONTROL */}
        <InspectorControls>
          <div className="inspector-controls-container-editor">
            <div>
              <h2>Logo des cartes</h2>
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
            <LinkCard
              numberOfCard="1"
              link={attributes.cardOneLink}
              onChange={(cardOneLink) => setAttributes({ cardOneLink })}
            />
            <LinkCard
              numberOfCard="2"
              link={attributes.cardTwoLink}
              onChange={(cardTwoLink) => setAttributes({ cardTwoLink })}
            />
            <LinkCard
              numberOfCard="3"
              link={attributes.cardThreeLink}
              onChange={(cardThreeLink) => setAttributes({ cardThreeLink })}
            />
            <LinkCard
              numberOfCard="4"
              link={attributes.cardFourLink}
              onChange={(cardFourLink) => setAttributes({ cardFourLink })}
            />
            <div>
              <h2>Saisissez le lien du boutton</h2>
              <RichText
                tagName="div"
                placeholder="https://..."
                value={attributes.sectionBtn}
                onChange={(sectionBtn) => setAttributes({ sectionBtn })}
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
