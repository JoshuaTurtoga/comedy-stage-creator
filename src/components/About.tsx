const About = () => {
  return (
    <section id="about" className="py-24 bg-card">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h2 className="font-display text-5xl md:text-6xl text-foreground mb-6">
              ABOUT <span className="text-primary">MIKE</span>
            </h2>
            <div className="space-y-4 text-muted-foreground leading-relaxed">
              <p>
                Mike Collins has been making audiences roar with laughter for over a decade. 
                Known for his razor-sharp observations and relatable storytelling, Mike transforms 
                everyday experiences into comedy gold.
              </p>
              <p>
                From sold-out theaters to late-night TV appearances, Mike has performed alongside 
                some of the biggest names in comedy. His debut special "Life's Too Short" broke 
                streaming records and earned critical acclaim.
              </p>
              <p>
                When he's not on stage, Mike hosts the popular podcast "Laughing Matters" and 
                continues to tour nationwide, bringing his unique brand of humor to fans everywhere.
              </p>
            </div>
            <div className="mt-8 flex gap-8">
              <div>
                <p className="font-display text-4xl text-primary">500+</p>
                <p className="text-muted-foreground text-sm">Live Shows</p>
              </div>
              <div>
                <p className="font-display text-4xl text-primary">2M+</p>
                <p className="text-muted-foreground text-sm">Followers</p>
              </div>
              <div>
                <p className="font-display text-4xl text-primary">50M+</p>
                <p className="text-muted-foreground text-sm">Views</p>
              </div>
            </div>
          </div>
          <div className="relative">
            <div className="aspect-[4/5] bg-secondary rounded-lg overflow-hidden glow-box">
              <div className="w-full h-full bg-gradient-to-br from-muted to-secondary flex items-center justify-center">
                <span className="font-display text-6xl text-muted-foreground/30">PHOTO</span>
              </div>
            </div>
            <div className="absolute -bottom-6 -left-6 w-32 h-32 border-4 border-primary rounded-lg" />
          </div>
        </div>
      </div>
    </section>
  );
};

export default About;
