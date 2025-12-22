import { Mail, Instagram, Twitter, Youtube } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";

const ContactSection = () => {
  return (
    <section id="contact" className="py-24 md:py-32 bg-primary text-primary-foreground">
      <div className="container mx-auto px-6">
        <div className="grid lg:grid-cols-2 gap-16 lg:gap-24">
          {/* Left side - Info */}
          <div>
            <p className="font-body text-sm uppercase tracking-[0.3em] text-accent mb-4">
              Get in Touch
            </p>
            <h2 className="font-display text-4xl md:text-5xl lg:text-6xl font-bold mb-8">
              Contact
            </h2>
            <p className="font-body text-primary-foreground/80 leading-relaxed mb-12">
              For booking inquiries, press requests, or just to say hi — 
              reach out through the form or connect on social media.
            </p>

            {/* Contact Info */}
            <div className="space-y-6 mb-12">
              <div className="flex items-center gap-4">
                <div className="w-12 h-12 rounded-full bg-accent/20 flex items-center justify-center">
                  <Mail className="w-5 h-5 text-accent" />
                </div>
                <div>
                  <p className="font-body text-sm text-primary-foreground/60 uppercase tracking-widest">
                    Management
                  </p>
                  <p className="font-body text-primary-foreground">
                    booking@catherinegeller.com
                  </p>
                </div>
              </div>
            </div>

            {/* Social Links */}
            <div>
              <p className="font-body text-sm uppercase tracking-widest text-primary-foreground/60 mb-4">
                Follow Along
              </p>
              <div className="flex gap-4">
                <a
                  href="#"
                  className="w-12 h-12 rounded-full bg-primary-foreground/10 flex items-center justify-center hover:bg-accent hover:text-accent-foreground transition-all"
                >
                  <Instagram className="w-5 h-5" />
                </a>
                <a
                  href="#"
                  className="w-12 h-12 rounded-full bg-primary-foreground/10 flex items-center justify-center hover:bg-accent hover:text-accent-foreground transition-all"
                >
                  <Twitter className="w-5 h-5" />
                </a>
                <a
                  href="#"
                  className="w-12 h-12 rounded-full bg-primary-foreground/10 flex items-center justify-center hover:bg-accent hover:text-accent-foreground transition-all"
                >
                  <Youtube className="w-5 h-5" />
                </a>
              </div>
            </div>
          </div>

          {/* Right side - Form */}
          <div className="bg-primary-foreground/5 rounded-2xl p-8 md:p-12 backdrop-blur-sm">
            <form className="space-y-6">
              <div className="grid sm:grid-cols-2 gap-6">
                <div>
                  <label className="font-body text-sm uppercase tracking-widest text-primary-foreground/60 mb-2 block">
                    Name
                  </label>
                  <Input
                    type="text"
                    placeholder="Your name"
                    className="bg-primary-foreground/10 border-primary-foreground/20 text-primary-foreground placeholder:text-primary-foreground/40 focus:border-accent"
                  />
                </div>
                <div>
                  <label className="font-body text-sm uppercase tracking-widest text-primary-foreground/60 mb-2 block">
                    Email
                  </label>
                  <Input
                    type="email"
                    placeholder="your@email.com"
                    className="bg-primary-foreground/10 border-primary-foreground/20 text-primary-foreground placeholder:text-primary-foreground/40 focus:border-accent"
                  />
                </div>
              </div>

              <div>
                <label className="font-body text-sm uppercase tracking-widest text-primary-foreground/60 mb-2 block">
                  Subject
                </label>
                <Input
                  type="text"
                  placeholder="What's this about?"
                  className="bg-primary-foreground/10 border-primary-foreground/20 text-primary-foreground placeholder:text-primary-foreground/40 focus:border-accent"
                />
              </div>

              <div>
                <label className="font-body text-sm uppercase tracking-widest text-primary-foreground/60 mb-2 block">
                  Message
                </label>
                <Textarea
                  placeholder="Your message..."
                  rows={5}
                  className="bg-primary-foreground/10 border-primary-foreground/20 text-primary-foreground placeholder:text-primary-foreground/40 focus:border-accent resize-none"
                />
              </div>

              <Button
                type="submit"
                className="w-full font-body uppercase tracking-widest bg-accent text-accent-foreground hover:bg-accent/90 py-6"
              >
                Send Message
              </Button>
            </form>
          </div>
        </div>
      </div>
    </section>
  );
};

export default ContactSection;
